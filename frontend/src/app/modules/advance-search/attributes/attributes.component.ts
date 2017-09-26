import {Component, OnInit, Input, OnChanges, SimpleChanges} from '@angular/core';

import {Category} from '../../../entities/category';
import {ProductAttribute} from '../../../entities/product-attribute';
import {Attribute} from '../../../entities/attribute';

@Component({
    selector: 'app-search-attributes',
    templateUrl: './attributes.component.html',
    styleUrls: ['./attributes.component.scss']
})
export class AttributesComponent implements OnInit, OnChanges {
    @Input() private categories: Category[];
    criteriaAttributes: ProductAttribute[][];
    constructor() {}

    ngOnInit() {
    }

    ngOnChanges(changes: SimpleChanges) {
        console.log(changes);
        if (changes['categories']) {
            for (let category of this.categories) {
                /**
                 * @todo update criteriaAttributes
                 */
            }
        }
    }
}
