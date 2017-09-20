import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {Route} from '../../core/route.service';

import {CategoriesComponent} from '../categories/categories.component';

const routes: Routes = Route.withShell([
    {path: 'categories', component: CategoriesComponent, data: {title: 'Categories'}}
]);

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class CategoriesRoutingModule {
    
}
