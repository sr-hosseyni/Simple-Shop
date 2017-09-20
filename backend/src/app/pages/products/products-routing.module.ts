import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {Route} from '../../core/route.service';

import {ProductsComponent} from './products.component';

const routes: Routes = Route.withShell([
    {path: 'products', component: ProductsComponent, data: {title: 'Products'}}
]);

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class ProductsRoutingModule {}
