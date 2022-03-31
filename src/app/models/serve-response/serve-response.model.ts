export interface ServerResponse {
  data: any;
  msg?: Message;
  token?: string;
  to?: number;
  current_page?: number;
  last_page?: number;
  total?: number;
  from?: number;
}

interface Message {
  summary: string;
  detail: string;
  code: string;
}