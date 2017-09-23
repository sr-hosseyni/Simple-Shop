import {Attribute} from './attribute';

export class ProductAttribute {
    attribute_id: number;
    product_id: number;
    value: any;

    attribute: Attribute;

    public constructor(attribute: Attribute) {
        this.attribute_id = attribute.id;
    }
}
