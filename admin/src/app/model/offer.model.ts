import {Contact} from "./contact.model";
import {Property} from "./property.model";
export class Offer{
  private _id;
  private _offerType;
  private _addDate;
  private _title;
  private _description;
  private _views;
  private _price;
  private _contact:Contact;
  private _property:Property;
  private _latitude;
  private _longitude;


    get id() {
      return this._id;
    }

  set id(value){
      this._id=value;
      }

  get offerType(){
      return this._offerType;
      }

  set offerType(value){
      this._offerType=value;
      }

  get addDate(){
      return this._addDate;
      }

  set addDate(value){
      this._addDate=value;
      }

  get title(){
      return this._title;
      }

  set title(value){
      this._title=value;
      }

  get description(){
      return this._description;
      }

  set description(value){
      this._description=value;
      }

  get views(){
      return this._views;
      }

  set views(value){
      this._views=value;
      }

  get price(){
      return this._price;
      }

  set price(value){
      this._price=value;
      }

  get contact():Contact{
      return this._contact;
      }

  set contact(value:Contact){
      this._contact=value;
      }

  get property():Property{
      return this._property;
      }

  set property(value:Property){
      this._property=value;
      }

  get latitude(){
      return this._latitude;
      }

  set latitude(value){
      this._latitude=value;
      }

  get longitude(){
      return this._longitude;
      }

  set longitude(value){
      this._longitude=value;
      }
}
