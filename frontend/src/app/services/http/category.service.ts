import {Injectable} from '@angular/core';
import {Http, Response} from '@angular/http';
import {Headers, RequestOptions} from '@angular/http';

import {Observable} from 'rxjs/Observable';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

import {Category} from '../../entities/category';

@Injectable()
export class CategoryService {
    private categoryUrl: '/category';

    constructor(private http: Http) {
    }

    all(): Observable<Category[]> {
        return this.http.get('/category')
            .map(this.extractData)
            .catch(this.handleError);
    }

    get(id: number): Observable<Category> {
        return this.http.get('/category/' + id)
            .map(this.extractData)
            .catch(this.handleError);
    }

    create(category: Category): Observable<Response> {
        let headers = new Headers({'Content-Type': 'application/json'});
        let options = new RequestOptions({headers: headers});

        return this.http.post('/category', category.transform(), options)
            .map(this.extractData)
            .catch(this.handleError);
    }

    update(category: Category): Observable<Response> {
        let headers = new Headers({'Content-Type': 'application/json'});
        let options = new RequestOptions({headers: headers});

        return this.http.put('/category/' + category.id, category.transform(), options)
            .map(this.extractData)
            .catch(this.handleError);
    }

    remove(category: Category): Observable<Response> {
        let headers = new Headers({'Content-Type': 'application/json'});
        let options = new RequestOptions({headers: headers});

        return this.http.delete('/category/' + category.id, options)
            .map(this.extractData)
            .catch(this.handleError);
    }

    extractData(res: Response) {
        let body = res.json();
        return body.data || {};
    }

    handleError(error: Response | any) {
        // In a real world app, you might use a remote logging infrastructure
        let errMsg: string;
        if (error instanceof Response) {
            const body = error.json() || '';
            const err = body.error || JSON.stringify(body);
            errMsg = `${error.status} - ${error.statusText || ''} ${err}`;
        } else {
            errMsg = error.message ? error.message : error.toString();
        }
        console.error(errMsg);
        return Observable.throw(errMsg);
    }
}
