import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SkillAndReferencesComponent } from './skill-and-references.component';

describe('SkillAndReferencesComponent', () => {
  let component: SkillAndReferencesComponent;
  let fixture: ComponentFixture<SkillAndReferencesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SkillAndReferencesComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SkillAndReferencesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
