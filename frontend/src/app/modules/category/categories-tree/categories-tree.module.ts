import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {NgbModule} from '@ng-bootstrap/ng-bootstrap';

import {CategoryModule} from '../category/category.module';
import {NewCategoryModule} from '../new-category/new-category.module';

import {CategoriesTreeComponent} from './categories-tree.component';

@NgModule({
    imports: [
        CommonModule,
        CategoryModule,
        NgbModule,
        NewCategoryModule,
    ],
    declarations: [
        CategoriesTreeComponent
    ],
    exports: [
        CategoriesTreeComponent
    ]
})
export class CategoriesTreeModule {}
