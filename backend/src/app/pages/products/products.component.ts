import {Component, OnInit} from '@angular/core';

import {CategoryService} from '../../services/http/category.service';
import {Category} from '../../entities/category';

@Component({
    selector: 'app-attributes',
    templateUrl: './products.component.html',
    styleUrls: ['./products.component.css'],
    providers: [
        CategoryService
    ]
})
export class ProductsComponent implements OnInit {
    mode = 'Observable';
    private errorMessage: string;
    private categories: Category[] = [];
    private category: Category = null;


    constructor(private categoryService: CategoryService) {}

    ngOnInit() {
        this.getCategoriesList();
    }

    getCategoriesList() {
        this.categoryService.all().
            subscribe(
            categories => this.categories = categories,
            error => this.errorMessage = <any> error
        );
    }

    onCategoryChange(category: Category) {
        this.category = Object.assign(new Category(), category);
    }
}
