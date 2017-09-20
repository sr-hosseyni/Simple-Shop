import {ProductAttribute} from './product-attribute';

export class Product {
    id: number;
    title: string;
    model: string;
    imgUrl: string;
    desc: string;
    price: number;
    status: string;
    quantity: number;
    category_id: number;
    attributes: ProductAttribute[] = [];

    public constructor() {
    }

    transform() {
        return {
            id: this.id,
            title: this.title,
            model: this.model,
            imgUrl: this.imgUrl,
            desc: this.desc,
            price: this.price,
            status: this.status,
            quantity: this.quantity,
            category_id: this.category_id,
            attributes: this.attributes
        };
    }
}
