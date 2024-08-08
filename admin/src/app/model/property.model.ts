import {Address} from "./address.model";
import {Photo} from "./photo.model";
export class Property{
  private _propertyType;
  private _buildingType;
  private _address:Address;
  private _area;
  private _roomCount;
  private _maxPerson;
  private _floor;
  private _lift;
  private _balcony;
  private _furnished;
  private _heatingType;
  private _parkingPlace;
  private _pets;
  private _photos:Photo[];
  private _builtYear;
  private _basement;
  private _garden;
  private _climatisation;


  get propertyType(){
      return this._propertyType;
      }

  set propertyType(value){
      this._propertyType=value;
      }

  get buildingType(){
      return this._buildingType;
      }

  set buildingType(value){
      this._buildingType=value;
      }

  get address():Address{
      return this._address;
      }

  set address(value:Address){
      this._address=value;
      }

  get area(){
      return this._area;
      }

  set area(value){
      this._area=value;
      }

  get roomCount(){
      return this._roomCount;
      }

  set roomCount(value){
      this._roomCount=value;
      }

  get maxPerson(){
      return this._maxPerson;
      }

  set maxPerson(value){
      this._maxPerson=value;
      }

  get floor(){
      return this._floor;
      }

  set floor(value){
      this._floor=value;
      }

  get lift(){
      return this._lift;
      }

  set lift(value){
      this._lift=value;
      }

  get balcony(){
      return this._balcony;
      }

  set balcony(value){
      this._balcony=value;
      }

  get furnished(){
      return this._furnished;
      }

  set furnished(value){
      this._furnished=value;
      }

  get heatingType(){
      return this._heatingType;
      }

  set heatingType(value){
      this._heatingType=value;
      }

  get parkingPlace(){
      return this._parkingPlace;
      }

  set parkingPlace(value){
      this._parkingPlace=value;
      }

  get pets(){
      return this._pets;
      }

  set pets(value){
      this._pets=value;
      }

  get photos():Photo[]{
      return this._photos;
      }

  set photos(value:Array){
      this._photos=value;
      }

  get builtYear(){
      return this._builtYear;
      }

  set builtYear(value){
      this._builtYear=value;
      }

  get basement(){
      return this._basement;
      }

  set basement(value){
      this._basement=value;
      }

  get garden(){
      return this._garden;
      }

  set garden(value){
      this._garden=value;
      }

  get climatisation(){
      return this._climatisation;
      }

  set climatisation(value){
      this._climatisation=value;
      }
}
