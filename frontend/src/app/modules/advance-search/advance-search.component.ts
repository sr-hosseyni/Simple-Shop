import {Component, OnInit, EventEmitter, Output} from '@angular/core';

import {ProductService} from '../../services/http/product.service';
import {ProductSearchService} from '../../services/product-search.service';
import {Product} from '../../entities/product';
import {Category} from '../../entities/category';
import {Attribute} from '../../entities/attribute';

@Component({
    selector: 'app-advance-search',
    templateUrl: './advance-search.component.html',
    styleUrls: ['./advance-search.component.scss'],
    providers: [
        ProductService,
        ProductSearchService
    ]
})
export class AdvanceSearchComponent implements OnInit {
    @Output() onChangeResults = new EventEmitter<Product[]>();
    private selectedCatgeories: Category[] = [];
    private errorMessage: string;

    constructor(private productService: ProductService, private productSearchService: ProductSearchService) {}

    ngOnInit() {
        this.fetchResults();
    }

    fetchResults() {
        let requestOptionsArg = null;
        if (this.selectedCatgeories.length) {
            requestOptionsArg = this.productSearchService.productsInCategories(this.selectedCatgeories);
        }

        this.productService.all(requestOptionsArg).
            subscribe(
                products => this.changeResults(products),
                error => this.errorMessage = <any> error
            );
    }

    changeResults(products: Product[]) {
        this.onChangeResults.emit(products);
    }

    refreshResults(categories: Category[]) {
        this.selectedCatgeories = categories;
        this.fetchResults();
    }
}
