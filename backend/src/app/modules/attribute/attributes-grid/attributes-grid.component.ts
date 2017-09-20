import {Component, OnInit, Input, OnChanges, SimpleChanges} from '@angular/core';

import {AttributeService} from '../../../services/http/attribute.service';
import {CategoryService} from '../../../services/http/category.service';
import {Category} from '../../../entities/category';
import {Option} from '../../../entities/option';
import {Attribute} from '../../../entities/attribute';

@Component({
    selector: 'app-attributes-grid',
    templateUrl: './attributes-grid.component.html',
    styleUrls: ['./attributes-grid.component.scss'],
    providers: [
        AttributeService,
        CategoryService
    ]
})
export class AttributesGridComponent implements OnInit, OnChanges {
    mode = 'Observable';
    private errorMessage: string;
    newAttribute: Attribute = new Attribute();
    @Input() category: Category;

    selectedItem: string;
    selectableItems: string[] = ['A', 'B'];

    constructor(private attributeService: AttributeService, private categoryService: CategoryService) {}

    ngOnInit() {
    }

    ngOnChanges(changes: SimpleChanges) {
        if (changes['category']) {
            if (this.category) {
                this.getcategoryWithAttributes();
            }
        }

        this.errorMessage = '';
    }

    getcategoryWithAttributes() {
        this.categoryService.get(this.category.id).
            subscribe(
                category => Object.assign(this.category, category),
                error => this.errorMessage = <any> error
            );
    }

    getOptionsString(options: Option[]) {
        let titles: string[] = [];
        for (let option of options) {
            titles.push(option.title);
        }

        return titles.join();
    }

    cancel() {
        this.newAttribute = new Attribute();
    }

    save() {
        this.newAttribute.category_id = this.category.id;
        this.attributeService.create(this.newAttribute)
            .subscribe(
                attribute => this.success(attribute),
                error => this.errorMessage = error
            );
    }

    success(attribute: Object) {
        this.category.attributes.push(Object.assign(new Attribute(), attribute));
        this.errorMessage = '';
    }
}
