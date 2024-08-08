export class Contact{
  private _name;
  private _email;
  private _phoneNumber;

  get name(){
      return this._name;
      }

  set name(value){
      this._name=value;
      }

  get email(){
      return this._email;
      }

  set email(value){
      this._email=value;
      }

  get phoneNumber(){
      return this._phoneNumber;
      }

  set phoneNumber(value){
      this._phoneNumber=value;
      }
}
