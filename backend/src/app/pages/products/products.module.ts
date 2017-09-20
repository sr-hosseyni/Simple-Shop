import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {ProductsRoutingModule} from './products-routing.module';
import {ProductsComponent} from './products.component';

import {ProductsGridModule} from '../../modules/product/products-grid/products-grid.module';
import {CategoriesListModule} from '../../modules/category/categories-list/categories-list.module';

@NgModule({
    imports: [
        CommonModule,
        ProductsRoutingModule,
        ProductsGridModule,
        CategoriesListModule
    ],
    declarations: [ProductsComponent]
})
export class ProductsModule {}
