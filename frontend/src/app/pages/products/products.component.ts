import {Component, OnInit, Input} from '@angular/core';

import {HttpService} from '../../core/http/http.service';
import {CategoryService} from '../../services/http/category.service';
import {Product} from '../../entities/product';

@Component({
    selector: 'app-products',
    templateUrl: './products.component.html',
    styleUrls: ['./products.component.scss'],
    providers: []
})
export class ProductsComponent implements OnInit {
    mode = 'Observable';
    private products: Product[] = [];


    constructor() {}

    ngOnInit() {
    }

    setProducts(products: Product[]) {
        this.products = products;
    }
}
