import {Offer} from "./offer.model";
export class Report{
  private _id;
  private _offer:Offer;
  private _reportDate;
  private _cause;


  get id(){
      return this._id;
      }

  set id(value){
      this._id=value;
      }

  get offer():Offer{
      return this._offer;
      }

  set offer(value:Offer){
      this._offer=value;
      }

  get reportDate(){
      return this._reportDate;
      }

  set reportDate(value){
      this._reportDate=value;
      }

  get cause(){
      return this._cause;
      }

  set cause(value){
      this._cause=value;
      }
}
