import {Component, OnInit, Output, EventEmitter} from '@angular/core';

import {CategoryService} from '../../../services/http/category.service';
import {Category} from '../../../entities/category';

@Component({
    selector: 'app-search-categories',
    templateUrl: './categories.component.html',
    styleUrls: ['./categories.component.scss'],
    providers: [
        CategoryService
    ]
})
export class CategoriesComponent implements OnInit {
    private categories: Category[];
    private selectedCategories: Category[] = [];
    private errorMessage: string;
    @Output() onChangeSelectedCategories = new EventEmitter<Category[]>();

    constructor(private categoryService: CategoryService) {}

    ngOnInit() {
        this.categoryService.all().
            subscribe(
                categories => this.categories = categories,
                error => this.errorMessage = <any> error
            );
    }

    changeCategorySelectionStatus(category: Category) {
        if (this.isCategorySelected(category)) {
            this.selectedCategories = this.selectedCategories.filter(function(cat: Category, index: number) {
                return cat.id != category.id;
            });
        } else {
            this.categoryService.get(category.id).
                subscribe(
                    cat => this.updateSelectedCategories(cat),
                    error => this.errorMessage = <any> error
                );
        }
    }

    updateSelectedCategories(category: Category) {
        this.selectedCategories.push(category)
        this.onChangeSelectedCategories.emit(this.selectedCategories)
    }

    isCategorySelected(category: Category) {
        for (let sCategory of this.selectedCategories) {
            if (sCategory.id == category.id) {
                return true;
            }
        }

        return false;
    }
}
