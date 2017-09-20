import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {FormsModule} from '@angular/forms';
import {HttpModule} from '@angular/http';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';
import {TranslateModule} from '@ngx-translate/core';

import {AppComponent} from './app.component';
import {AppRoutingModule} from './app-routing.module';

import {CoreModule} from './core/core.module';
import {SharedModule} from './modules/shared/shared.module';
import {HomeModule} from './pages/home/home.module';
import {AboutModule} from './pages/about/about.module';
import {LoginModule} from './pages/login/login.module';
import {CategoriesModule} from './pages/categories/categories.module';
import {AttributesModule} from './pages/attributes/attributes.module';
import {ProductsModule} from './pages/products/products.module';

@NgModule({
    imports: [
        BrowserModule,
        FormsModule,
        HttpModule,
        TranslateModule.forRoot(),
        NgbModule.forRoot(),
        CoreModule,
        SharedModule,
        HomeModule,
        AboutModule,
        LoginModule,
        CategoriesModule,
        AttributesModule,
        ProductsModule,
        AppRoutingModule
    ],
    declarations: [
        AppComponent
    ],
    exports: [
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule {}
