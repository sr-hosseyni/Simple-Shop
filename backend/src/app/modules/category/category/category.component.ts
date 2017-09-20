import {Component, OnInit, Input, Output, EventEmitter} from '@angular/core';

import {CategoryService} from '../../../services/http/category.service';
import {Category} from '../../../entities/category';

@Component({
    selector: 'app-category',
    templateUrl: './category.component.html',
    styleUrls: ['./category.component.css'],
    providers: [
        CategoryService
    ]
})
export class CategoryComponent implements OnInit {
    @Input() category: Category;
    @Output() onRemove = new EventEmitter<Category>();

    private editingCategory: Category = new Category();
    private editMode: boolean = false;
    private mouseOverEdit: boolean = false;

    constructor(private categoryService: CategoryService) {}

    ngOnInit() {
    }

    remove() {
        this.categoryService.remove(this.category)
            .subscribe(
                response => this.onRemove.emit(this.category),
                error => console.log(error)
            );
    }

    edit() {
        Object.assign(this.editingCategory, this.category);
        this.editMode = true;
    }

    cancelEdit() {
        this.editMode = false;
    }

    update() {
        this.categoryService.update(this.editingCategory)
            .subscribe(
                response => this.successUpdate(response),
                error => console.log(error)
            );
    }

    successUpdate(response: Object) {
        Object.assign(this.category, response);
        this.editMode = false;
    }
}
