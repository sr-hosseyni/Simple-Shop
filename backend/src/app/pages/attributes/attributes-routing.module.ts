import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {Route} from '../../core/route.service';

import {AttributesComponent} from './attributes.component';

const routes: Routes = Route.withShell([
    {path: 'attributes', component: AttributesComponent, data: {title: 'Attributes'}}
]);

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class AttributesRoutingModule {}
