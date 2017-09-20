import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {CategoriesRoutingModule} from './categories-routing.module';
import {CategoriesComponent} from './categories.component';

import {CategoriesTreeModule} from '../../modules/category/categories-tree/categories-tree.module';

@NgModule({
    imports: [
        CommonModule,
        CategoriesRoutingModule,
        CategoriesTreeModule
    ],
    declarations: [
        CategoriesComponent
    ]
})
export class CategoriesModule {}
