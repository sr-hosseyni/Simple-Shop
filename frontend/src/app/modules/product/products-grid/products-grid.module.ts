import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {FormsModule}   from '@angular/forms';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';

import {ProductsGridComponent} from './products-grid.component';

@NgModule({
    imports: [
        CommonModule,
        FormsModule,
        NgbModule
    ],
    declarations: [
        ProductsGridComponent
    ],
    exports: [
        ProductsGridComponent
    ]
})
export class ProductsGridModule {}
