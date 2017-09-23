import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {FormsModule}   from '@angular/forms';

import {NewCategoryComponent} from './new-category.component';

@NgModule({
    imports: [
        CommonModule,
        FormsModule
    ],
    declarations: [
        NewCategoryComponent
    ],
    exports: [
        NewCategoryComponent
    ]
})
export class NewCategoryModule {}
