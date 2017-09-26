import {Component, OnInit, Input, OnChanges, SimpleChanges} from '@angular/core';

import {Category} from '../../../entities/category';
import {Product} from '../../../entities/product';
import {ProductAttribute} from '../../../entities/product-attribute';
import {Attribute} from '../../../entities/attribute';

@Component({
    selector: 'app-search-attributes',
    templateUrl: './attributes.component.html',
    styleUrls: ['./attributes.component.scss']
})
export class AttributesComponent implements OnInit, OnChanges {
    @Input() private categories: Category[];
    criterias: Product[];
    constructor() {}

    ngOnInit() {
    }

    ngOnChanges(changes: SimpleChanges) {
//        if (changes['categories']) {
            this.refreshCriterias();
//        }
    }

    refreshCriterias() {
        let criterias: Product[] = [];
        for (let category of this.categories) {
            let product: Product = this.getCriteria(category);

            if (!product) {
                product = new Product();
                product.category_id = category.id;

                for (let attr of category.attributes) {
                    product.attributes.push(new ProductAttribute(product, attr))
                }
            }

            criterias.push(product);
        }
        this.criterias = criterias;
    }

    getCriteria(category: Category) {
        for (let product of this.criterias) {
            if (product.category_id == category.id) {
                return product;
            }
        }

        return null;
    }
}
