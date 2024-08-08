export class Address{
  private _street;
  private _city;
  private _country;
  
  get street(){
      return this._street;
      }

  set street(value){
      this._street=value;
      }

  get city(){
      return this._city;
      }

  set city(value){
      this._city=value;
      }

  get country(){
      return this._country;
      }

  set country(value){
      this._country=value;
      }
}
