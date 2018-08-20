import validation from '../modules/validation';
import Selectr from '../../../../node_modules/mobius1-selectr/dist/selectr.min.js';

export class Form {

  constructor() {

    let selectLists = document.querySelectorAll('.select');

    selectLists.forEach((evt) => {
      new Selectr('.select');
    });

  }
  
}