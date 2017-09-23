import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AttributesGridComponent } from './attributes-grid.component';

describe('AttributesGridComponent', () => {
  let component: AttributesGridComponent;
  let fixture: ComponentFixture<AttributesGridComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AttributesGridComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AttributesGridComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
