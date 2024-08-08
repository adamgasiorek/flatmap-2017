package com.yeahbunny.service;

import com.yeahbunny.dao.CurrencyRepository;
import com.yeahbunny.domain.CurrencyEntity;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Service;
import org.w3c.dom.Document;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

import javax.inject.Inject;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathConstants;
import javax.xml.xpath.XPathFactory;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;


@Service
public class CurrencyUpdaterService {

    @Inject
    private CurrencyRepository currencyRepository;

    @Inject
    private NotifyAdminService notifyAdminService;

    private final static Logger LOG = LoggerFactory.getLogger(CurrencyUpdaterService.class);

    private String currencyUrl = "http://www.nbp.pl/kursy/xml/LastA.xml";

    public void execute(){
        List<CurrencyEntity> currencyDataList = getData();

        if(currencyDataList==null){
            return;
        }

        currencyDataList.forEach((currencyEntity -> {
            currencyRepository.save(currencyEntity);
        }));



    }

    private List<CurrencyEntity> getData(){
        try{
            URL url = new URL(currencyUrl);
            try(InputStream iStream = url.openStream()){

                return convertData(iStream);
            }catch (Exception e){
                e.printStackTrace();
                return null;
            }

        }catch (MalformedURLException e){
            e.printStackTrace();
            return null;
        }
    }

    private List<CurrencyEntity> convertData(InputStream is) throws IOException,Exception {
        List<CurrencyEntity> resultList = new ArrayList<>();
      DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
        DocumentBuilder builder = factory.newDocumentBuilder();
        Document doc = builder.parse(is);

        NodeList positionList = doc.getElementsByTagName("pozycja");

        for(int i = 0 ; i < positionList.getLength(); i++){
            Node position =  positionList.item(i);
            Node node = position.getFirstChild().getNextSibling().getNextSibling().getNextSibling().getNextSibling().getNextSibling();

            try{
                String code = node.getFirstChild().getTextContent();
                Double value = Double.parseDouble(node.getNextSibling().getNextSibling().getFirstChild().getTextContent().replace(',','.'));
               resultList.add(new CurrencyEntity(code,value));
            }catch (NullPointerException | NumberFormatException e){
                notifyAdminService.currencyUpdaterError();
                e.printStackTrace();
                return null;
            }

        }
        return resultList;

    }
}
