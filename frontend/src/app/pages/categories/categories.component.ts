import {Component, OnInit} from '@angular/core';

import {Category} from '../../entities/category';
import {CategoryService} from '../../services/http/category.service';

@Component({
    selector: 'app-categories',
    providers: [CategoryService],
    templateUrl: './categories.component.html',
    styleUrls: ['./categories.component.css']
})
export class CategoriesComponent implements OnInit {

    mode = 'Observable';
    categories: Category[];
    errorMessage: string;

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
}
