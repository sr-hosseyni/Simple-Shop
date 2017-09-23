import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {FormsModule}   from '@angular/forms';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';

import {AttributesGridComponent} from './attributes-grid.component';

@NgModule({
    imports: [
        CommonModule,
        FormsModule,
        NgbModule
    ],
    declarations: [
        AttributesGridComponent
    ],
    exports: [
        AttributesGridComponent
    ]
})
export class AttributesGridModule {}
