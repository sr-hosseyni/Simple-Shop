import {Product} from './product';
import {Attribute} from './attribute';

export class Category {
    id: number;
    title: string;
    desc: string;
    parent_id: number;
    children: Category[] = [];
    attributes: Attribute[] = [];
    products: Product[] = [];

    public constructor() {
    }

    transform() {
        return {
            id : this.id,
            title : this.title,
            desc: this.desc,
            parent_id: this.parent_id,
        };
    }

//    assign(category: {}): Category {
//        console.log(category);
//        Object.assign(this, category);
//        console.log(this.attributes);
//        let attrs: Attribute[] = [];
//        for (let attribute in this.attributes) {
//            let attrObj = new Attribute();
//            attrs.push(attrObj.assign(attribute));
//        }
//
//        this.attributes = attrs;
//
//        return this;
//    }
}
