import {Component, OnInit, Output, EventEmitter, Input} from '@angular/core';

import {Category} from '../../../entities/category';

@Component({
    selector: 'app-search-categories-node',
    templateUrl: './categories-node.component.html',
    styleUrls: ['./categories-node.component.scss']
})
export class CategoriesNodeComponent implements OnInit {
    @Output() onChangeCategorySelectionStatus = new EventEmitter<Category>();
    @Output() onCheckingIsCategorySelected =new EventEmitter<Category>();
    @Input() private categories: Category[];

    constructor() {}

    ngOnInit() {
    }

    isCategorySelected(category: Category) {
        return this.onCheckingIsCategorySelected.emit(category);
    }

    changeCategorySelectionStatus(category: Category) {
        this.onChangeCategorySelectionStatus.emit(category);
    }
}
