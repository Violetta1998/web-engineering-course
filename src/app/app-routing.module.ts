import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { PetListComponent } from './pet-list/pet-list.component';
import { MainPageComponent } from './main-page/main-page.component';
import {AboutComponent} from './about/about.component';
import { PetEditComponent } from './pet-edit/pet-edit.component';

const routes: Routes = [
  {
    path: "",
    redirectTo: "/main",
    pathMatch: "full",
  },
  {
    path: "main",
    component: MainPageComponent,
  },
  {
    path: "about",
    component: AboutComponent,
  },
  {
    path: "pets",
    component: PetListComponent,
  },
  {
    path: "pets/:id/edit",
    component: PetEditComponent,
  },
  {
    path: "pets/new",
    component: PetEditComponent,
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
