import {Option} from './option';

export class Attribute {
    id: number;
    title: string;
    desc: string;
    type: string;
    category_id: number;
    options: Option[] = [];
    optionsStr: string;

    public constructor() {
    }

    transform() {
        return {
            id : this.id,
            title : this.title,
            desc: this.desc,
            type: this.type,
            category_id: this.category_id,
            optionsStr: this.optionsStr
        };
    }

    getOptionsString() {
        this.options.join();
    }

//    assign(attribute: {}): Attribute {
//        Object.assign(this, attribute);
//        console.log(this.options);
//        let ops: Option[] = [];
//        for (let option in this.options) {
//            let optionObj = new Option();
//            ops.push(optionObj.assign(option));
//        }
//        this.options = ops;
//
//        return this;
//    }
}
