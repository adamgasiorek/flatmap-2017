import {Contact} from "./contact.model";
export class User{
  private _id;
  private _email;
  private _name;
  private _contact:Contact;
  private _activated;
  private _points;


    get id() {
      return this._id;
    }

  set id(value){
      this._id=value;
      }

  get email() {
      return this._email;
    }

  set email(value){
      this._email=value;
      }

  get name(){
      return this._name;
      }

  set name(value){
      this._name=value;
      }

  get contact():Contact{
      return this._contact;
      }

  set contact(value:Contact){
      this._contact=value;
      }

  get activated(){
      return this._activated;
      }

  set activated(value){
      this._activated=value;
      }

  get points(){
      return this._points;
      }

  set points(value){
      this._points=value;
      }
}
