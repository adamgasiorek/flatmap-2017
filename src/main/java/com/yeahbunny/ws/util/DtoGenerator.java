package com.yeahbunny.ws.util;

import com.yeahbunny.domain.AbstractEntity;
import org.apache.commons.lang.NotImplementedException;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.util.StringUtils;

import java.lang.reflect.*;
import java.util.*;

public class DtoGenerator<OUTPUT> {

    private static final Logger LOG = LoggerFactory.getLogger(DtoGenerator.class);

    public OUTPUT generate(Class<OUTPUT> outputClass, AbstractEntity entity) {
        List<Field> dtoFields = Arrays.asList(outputClass.getDeclaredFields());

        OUTPUT output;
        try{
            output = outputClass.newInstance();
        }catch (InstantiationException | IllegalAccessException e){
            e.printStackTrace();
            return null;
        }

        dtoFields.forEach((outputField)->{
            try {
                Field entityField;
                if (outputField.getName().equals("id")) {
                    entityField = entity.getClass().getSuperclass().getDeclaredField(outputField.getName());
                } else {
                    entityField = entity.getClass().getDeclaredField(outputField.getName());
                }

                Method getMethod = entity.getClass().getMethod("get" + StringUtils.capitalize(entityField.getName()));
                Method setMethod = outputClass.getMethod("set" + StringUtils.capitalize(outputField.getName()), outputField.getType());
                Object argument;

                if(Collection.class.isAssignableFrom(entityField.getType())){

                    argument = this.getCollectionAsArgument(getGenericType(outputField), (Collection<AbstractEntity>) getMethod.invoke(entity));
                }else if(Map.class.isAssignableFrom(entityField.getType())){
                    argument = null;
                    throw new NotImplementedException();
                }else if(AbstractEntity.class.isAssignableFrom(entityField.getType())){
                    argument = new DtoGenerator<>().generate((Class<Object>)outputField.getType(),(AbstractEntity)getMethod.invoke(entity));
                }else{
                    argument = getMethod.invoke(entity);
                }
                setMethod.invoke(output,argument);
            }catch (NoSuchMethodException | NoSuchFieldException | IllegalAccessException e){
                e.printStackTrace();
            }catch (InvocationTargetException e){
                e.printStackTrace();
            }
        });
        return output;
    }

    private Class<Object> getGenericType(Field outputField) {
        Type genericFieldType = outputField.getGenericType();

        if(genericFieldType instanceof ParameterizedType){
            ParameterizedType aType = (ParameterizedType) genericFieldType;
            Type[] fieldArgTypes = aType.getActualTypeArguments();
            for(Type fieldArgType : fieldArgTypes){
                Class fieldArgClass = (Class) fieldArgType;
                return fieldArgClass;
            }
        }

        return null;
    }

    private Collection<Object> getCollectionAsArgument(Class<Object> type, Collection<AbstractEntity> collection){
        List<Object> result = new ArrayList();
        collection.forEach((item)->{
            result.add(new DtoGenerator<>().generate(type,item));
        });
        return result;
    }
}
