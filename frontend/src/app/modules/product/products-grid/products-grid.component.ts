import {Component, OnInit, Input, OnChanges, SimpleChanges} from '@angular/core';

import {ProductService} from '../../../services/http/product.service';
import {CategoryService} from '../../../services/http/category.service';
import {Category} from '../../../entities/category';
import {Option} from '../../../entities/option';
import {Product} from '../../../entities/product';
import {Attribute} from '../../../entities/Attribute';
import {ProductAttribute} from '../../../entities/product-attribute';

@Component({
    selector: 'app-products-grid',
    templateUrl: './products-grid.component.html',
    styleUrls: ['./products-grid.component.scss'],
    providers: [
        ProductService,
        CategoryService
    ]
})
export class ProductsGridComponent implements OnInit {
    mode = 'Observable';
    @Input() private products: Product[] = [];
    private errorMessage: Object;

    constructor(
        private productService: ProductService,
         private categoryService: CategoryService
    ) {}

    ngOnInit() {
    }

//    getProducts() {
//        this.productService.all(this.category).
//            subscribe(
//                products => this.products = products,
//                error => this.errorMessage = <any> error
//            );
//    }
//
//    cancel() {
//        this.newProduct = new Product();
//    }
//
//    save() {
//        this.newProduct.category_id = this.category.id;
//        this.productService.create(this.newProduct)
//            .subscribe(
//                product => this.success(product),
//                error => this.errorMessage = error
//            );
//    }
//
//    success(product: Object) {
//        this.products.push(Object.assign(new Product(), product));
//        this.errorMessage = '';
//    }
}
