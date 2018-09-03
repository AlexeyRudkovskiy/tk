import {SimpleAction} from "./simple-action";

export class ActionListOutdent extends SimpleAction {

  protected commandName: string = 'outdent';

  protected hotKey: string = this.composeHotKey('[');

  getDescription(): string {
    return "Indent list";
  }

  getIcon(): string {
    return "fa fa-outdent";
  }

  getName(): string {
    return "toolbar.list.outdent";
  }

}