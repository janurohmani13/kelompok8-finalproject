import { ComponentFixture, TestBed } from '@angular/core/testing';
import { KurirPage } from './kurir.page';

describe('KurirPage', () => {
  let component: KurirPage;
  let fixture: ComponentFixture<KurirPage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(KurirPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
