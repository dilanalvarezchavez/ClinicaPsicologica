import { Component, OnInit } from '@angular/core';
import { MessageService } from '../../services/messages/message.service';
import { PaperService } from '../../services/papers.service';

import { PaperModel } from '../../models/paper/paper.model';
import { UsersService } from 'src/app/services/users.service';

import * as XLSX from 'xlsx';

@Component({
  selector: 'app-data',
  templateUrl: './data.component.html',
  styleUrls: ['./data.component.css']
})
export class DataComponent implements OnInit {

  paper: PaperModel = {};
  papers: PaperModel[] = [];
  date: string;
  nombre: string;
  /*name of the excel-file which will be downloaded. */

  fileName = 'datos.xlsx';
  ngOnInit() {
    this.getPapers();
  }
  constructor(
    private PaperService: PaperService,
    private MessageService: MessageService,
  ) { }
  exportexcel(): void {
    /* table id is passed over here */
    let element = document.getElementById('export');
    const ws: XLSX.WorkSheet = XLSX.utils.table_to_sheet(element);

    /* generate workbook and add the worksheet */
    const wb: XLSX.WorkBook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

    /* save to file */
    XLSX.writeFile(wb, this.fileName);

  }

  // obtiene un registro de la base de datos
  getPaper(Paper: PaperModel) {
    this.PaperService.getOne(Paper.id).subscribe(
      response => {
        // console.log(response.data);
        this.paper = response.data;
      }, error => {
        this.MessageService.error(error);
      }
    );
  }
  //obtiene todos los registro de la base de datos
  getPapers() {
    this.PaperService.getAll().subscribe(
      response => {
        this.getPaper(response.data[0]);

        this.papers = response.data;
        // console.log(typeof this.paper);
        // console.log(this.paper);
      }, error => {
        this.MessageService.error(error);
      }
    );
  }
  Search() {
    if (this.date != "") {
      this.papers = this.papers.filter(res => {
        return res.dia.toLocaleLowerCase().match(this.date.toLocaleLowerCase());
      });
    } else if (this.date == "") {
      this.ngOnInit();
    }

  }
  SearchUser() {
    if (this.nombre != "") {
      this.papers = this.papers.filter(res => {
        return res.name.toLocaleLowerCase().match(this.nombre.toLocaleLowerCase());
        // return res.name.includes(this.nombre);


      });
    } else if (this.nombre == "") {
      this.ngOnInit();
    }

  }
}
