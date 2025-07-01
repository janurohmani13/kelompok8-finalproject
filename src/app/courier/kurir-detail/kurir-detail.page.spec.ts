import { ComponentFixture, TestBed } from '@angular/core/testing';
import { KurirDetailPage } from './kurir-detail.page';

describe('KurirDetailPage', () => {
  let component: KurirDetailPage;
  let fixture: ComponentFixture<KurirDetailPage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(KurirDetailPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
