import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {AttributesRoutingModule} from './attributes-routing.module';
import {AttributesComponent} from './attributes.component';

import {AttributesGridModule} from '../../modules/attribute/attributes-grid/attributes-grid.module';
import {CategoriesListModule} from '../../modules/category/categories-list/categories-list.module';

@NgModule({
    imports: [
        CommonModule,
        AttributesRoutingModule,
        AttributesGridModule,
        CategoriesListModule
    ],
    declarations: [AttributesComponent]
})
export class AttributesModule {}
