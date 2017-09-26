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
}
