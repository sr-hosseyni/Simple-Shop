import {Attribute} from './attribute';
import {Product} from './product';

export class ProductAttribute {
    attribute_id: number;
    product_id: number;
    value: any;

    attribute: Attribute;
    product: Product;

    public constructor(product: Product, attribute: Attribute) {
        this.attribute_id = attribute.id;
        this.attribute = attribute;
        this.product_id = product.id;
        this.product = product;
    }
}
