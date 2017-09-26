import {Injectable} from '@angular/core';
import {RequestOptions, RequestOptionsArgs, URLSearchParams} from '@angular/http';

import {Category} from '../entities/category';

@Injectable()
export class ProductSearchService {

    constructor() {}

    serialize(obj: Object, prefix?: any): string {
        var str = [], p;
        for (p in obj) {
            if (obj.hasOwnProperty(p)) {
                var k = prefix ? prefix + "[" + p + "]" : p, v = obj[p];
                str.push((v !== null && typeof v === "object") ?
                    this.serialize(v, k) :
                    k + "=" + v);
            }
        }
        return str.join("&");
    }

    productsInCategories(categories: Category[]): RequestOptionsArgs {
        let ids = [];
        for (let category of categories) {
            ids.push(category.id);
        }

        let params = {
            "filter_groups": [
                {
                    "filters": [
                        {
                            "key": "category_id",
                            "value": ids,
                            "operator": "in"
                        }
                    ]
                }
            ]
        };

        return new RequestOptions({params: this.serialize(params, '')});
    }
}
