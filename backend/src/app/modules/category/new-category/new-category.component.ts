import {Component, OnInit, Input, Output, EventEmitter} from '@angular/core';

import {CategoryService} from '../../../services/http/category.service';
import {Category} from '../../../entities/category';

@Component({
    selector: 'app-new-category',
    templateUrl: './new-category.component.html',
    styleUrls: ['./new-category.component.css'],
    providers: [
        CategoryService
    ]
})
export class NewCategoryComponent implements OnInit {
    @Output() onCancel = new EventEmitter();
    @Output() onSuccess = new EventEmitter<Category>();
    @Input() parentId: number;

    private category: Category = new Category();

    constructor(private categoryService: CategoryService) {
    }

    ngOnInit() {
    }

    cancel() {
        this.onCancel.emit();
    }

    save() {
        this.category.parent_id = this.parentId;
        this.categoryService.create(this.category)
            .subscribe(
                response => this.success(response),
                error => console.log(error)
            );
    }

    success(response: Object) {
        Object.assign(this.category, response);
        this.onSuccess.emit(this.category);
    }
}
