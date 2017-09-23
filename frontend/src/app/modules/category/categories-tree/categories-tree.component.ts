import {Component, OnInit, Input, AfterContentInit} from '@angular/core';

import {Category} from '../../../entities/category';

@Component({
    selector: 'app-categories-tree',
    templateUrl: './categories-tree.component.html',
    styleUrls: ['./categories-tree.component.css']
})
export class CategoriesTreeComponent implements OnInit, AfterContentInit {
    @Input() categories: Category[];
    @Input() parentCategoryId: number = null;

    public isChildCollapsed: boolean[] = [];
    private newChildCategory: boolean = false;

    constructor() {
    }

    ngOnInit() {
    }

    ngAfterContentInit() {
    }

    isChildrenCollapsed(CatId: number) {
        if (CatId in this.isChildCollapsed) {
            return this.isChildCollapsed[CatId];
        }

        return true;
    }

    addChildCategory() {
        this.newChildCategory = true;
    }

    cancelAddingChildCategory() {
        this.newChildCategory = false;
    }

    successAddingChildCategory(category: Category) {
        this.newChildCategory = false;
        this.categories.push(category);
    }

    onChildRemove(removedChild: Category) {
        this.categories = this.categories.filter(item => item.id !== removedChild.id);
    }
}
