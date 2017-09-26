import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {ProductsRoutingModule} from './products-routing.module';
import {ProductsComponent} from './products.component';

import {ProductsGridModule} from '../../modules/product/products-grid/products-grid.module';
import {AdvanceSearchModule} from '../../modules/advance-search/advance-search.module';

@NgModule({
    imports: [
        CommonModule,
        ProductsRoutingModule,
        ProductsGridModule,
        AdvanceSearchModule
    ],
    declarations: [
        ProductsComponent
    ]
})
export class ProductsModule {}
