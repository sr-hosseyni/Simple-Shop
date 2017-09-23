import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';

import {CategoriesListComponent} from './categories-list.component';

@NgModule({
    imports: [
        CommonModule,
        NgbModule
    ],
    declarations: [
        CategoriesListComponent
    ],
    exports: [
        CategoriesListComponent
    ]
})
export class CategoriesListModule {}
