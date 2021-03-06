import {Injectable} from '@angular/core';
import {Http, Response} from '@angular/http';
import {Headers, RequestOptions} from '@angular/http';

import {Observable} from 'rxjs/Observable';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

import {Attribute} from '../../entities/attribute';

@Injectable()
export class AttributeService {
    private attributeUrl: '/attribute';

    constructor(private http: Http) {
    }

    all(): Observable<Attribute[]> {
        return this.http.get('/attribute')
            .map(this.extractData)
            .catch(this.handleError);
    }

    create(attribute: Attribute): Observable<Response> {
        let headers = new Headers({'Content-Type': 'application/json'});
        let options = new RequestOptions({headers: headers});

        return this.http.post('/attribute', attribute.transform(), options)
            .map(this.extractData)
            .catch(this.handleError);
    }

    update(attribute: Attribute): Observable<Response> {
        let headers = new Headers({'Content-Type': 'application/json'});
        let options = new RequestOptions({headers: headers});

        return this.http.put('/attribute/' + attribute.id, attribute.transform(), options)
            .map(this.extractData)
            .catch(this.handleError);
    }

    remove(attribute: Attribute): Observable<Response> {
        let headers = new Headers({'Content-Type': 'application/json'});
        let options = new RequestOptions({headers: headers});

        return this.http.delete('/attribute/' + attribute.id, options)
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
