import {Component, OnInit, Input, Output, EventEmitter} from '@angular/core';

import {Category} from '../../../entities/category';

@Component({
    selector: 'app-categories-list',
    templateUrl: './categories-list.component.html',
    styleUrls: ['./categories-list.component.css']
})
export class CategoriesListComponent implements OnInit {
    @Output() onSelectCategory = new EventEmitter<Category>();
    @Input() categories: Category[];
    @Input() currentCategory: Category;
    @Input() isChild: boolean = false;

    constructor() {}

    ngOnInit() {
    }

    selectCategory(category: Category) {
        this.onSelectCategory.emit(category);
    }

    currentCategoryTitle() {
        if (this.currentCategory != null) {
            return this.currentCategory.title;
        }

        return 'Select Category';
    }
}
