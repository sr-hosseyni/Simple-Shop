import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {CategoriesComponent} from './categories/categories.component';
import {AttributesComponent} from './attributes/attributes.component';
import { AdvanceSearchComponent } from './advance-search.component';
import { CategoriesNodeComponent } from './categories-node/categories-node.component';

@NgModule({
    imports: [
        CommonModule
    ],
    declarations: [
        CategoriesComponent,
        AttributesComponent,
        AdvanceSearchComponent,
        CategoriesNodeComponent
    ],
    exports: [
        AdvanceSearchComponent
    ]
})
export class AdvanceSearchModule {}
